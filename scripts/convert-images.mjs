import { readdir, writeFile } from 'node:fs/promises';
import path from 'node:path';
import sharp from 'sharp';

const publicDirectory = path.resolve('public');
const supportedExtensions = new Set(['.png', '.jpg', '.jpeg']);

async function findImages(directory) {
    const entries = await readdir(directory, { withFileTypes: true });
    const images = [];

    for (const entry of entries) {
        const entryPath = path.join(directory, entry.name);

        if (entry.isDirectory()) {
            images.push(...await findImages(entryPath));
        } else if (supportedExtensions.has(path.extname(entry.name).toLowerCase())) {
            images.push(entryPath);
        }
    }

    return images;
}

const images = await findImages(publicDirectory);

await Promise.all(images.map(async (imagePath) => {
    const webpPath = imagePath.replace(/\.(png|jpe?g)$/i, '.webp');
    const optimizedPng = await sharp(imagePath)
        .resize({ width: 900, withoutEnlargement: true })
        .png({ quality: 60, compressionLevel: 9, palette: true })
        .toBuffer();

    await sharp(imagePath)
        .resize({ width: 900, withoutEnlargement: true })
        .webp({ quality: 80, effort: 4 })
        .toFile(webpPath);

    if (path.extname(imagePath).toLowerCase() === '.png') {
        await writeFile(imagePath, optimizedPng);
    }

    if (path.basename(imagePath).toLowerCase() === 'cover.png') {
        const thumbnailPath = path.join(path.dirname(imagePath), 'cover-thumb.webp');

        await sharp(imagePath)
            .resize({ width: 440, height: 240, fit: 'cover' })
            .webp({ quality: 80, effort: 4 })
            .toFile(thumbnailPath);
    }

    console.log(`Generated ${path.relative(process.cwd(), webpPath)}`);
}));

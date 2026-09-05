import { readdir } from 'node:fs/promises';
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

    await sharp(imagePath)
        .resize({ width: 1200, withoutEnlargement: true })
        .webp({ quality: 78, effort: 4 })
        .toFile(webpPath);

    console.log(`Generated ${path.relative(process.cwd(), webpPath)}`);
}));

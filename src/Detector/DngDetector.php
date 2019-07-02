<?php

namespace Selective\ImageType\Detector;

use Selective\ImageType\ImageType;
use SplFileObject;

/**
 * Detector.
 */
final class DngDetector implements DetectorInterface
{
    /**
     * DNG identification.
     *
     * @param SplFileObject $file The image file
     *
     * @return ImageType|null The image type
     */
    public function detect(SplFileObject $file): ?ImageType
    {
        $file->rewind();
        $bytes = $file->fread(2);

        // TIFF header
        if ($bytes !== 'II' && $bytes !== 'MM') {
            return null;
        }

        $file->fread(6);
        $bytes = $file->fread(12) ?: "";

        return ((strpos($bytes, "\x04") !== false || strpos($bytes, "\x02") !== false) && strpos($bytes, "\x01") && substr_count($bytes, "\0") >= 2) ? new ImageType(ImageType::DNG) : null;
    }
}
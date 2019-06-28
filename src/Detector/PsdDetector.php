<?php

namespace Selective\ImageType\Detector;

use Selective\ImageType\ImageType;
use SplFileObject;

/**
 * Detector.
 */
final class PsdDetector implements DetectorInterface
{
    /**
     * PSD identification.
     *
     * @param SplFileObject $file The image file
     *
     * @return ImageType|null The image type
     */
    public function detect(SplFileObject $file): ?ImageType
    {
        $file->rewind();

        return $file->fread(2) === '8B' ? new ImageType(ImageType::PSD) : null;
    }
}
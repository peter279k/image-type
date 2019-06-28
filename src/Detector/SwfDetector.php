<?php

namespace Selective\ImageType\Detector;

use Selective\ImageType\ImageType;
use SplFileObject;

/**
 * Detector.
 */
final class SwfDetector implements DetectorInterface
{
    /**
     * SWF (Flash) identification.
     *
     * https://www.adobe.com/content/dam/acom/en/devnet/pdf/swf-file-format-spec.pdf#page=27
     *
     * @param SplFileObject $file The image file
     *
     * @return ImageType|null The image type
     */
    public function detect(SplFileObject $file): ?ImageType
    {
        $file->rewind();
        $compression = $file->fread(1) ?: '';
        $signature = $file->fread(2) ?: '';

        $compressions = [
            'F' => 1,
            'C' => 1,
            'Z' => 1,
        ];

        return $signature === 'WS' && isset($compressions[$compression]) ? new ImageType(ImageType::SWF) : null;
    }
}
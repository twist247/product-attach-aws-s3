<?php

namespace Prince\Productattach\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class AwsHelper extends AbstractHelper
{
    const XML_PATH_ACCESS_KEY  = 'productattach/aws_s3_storage/access_key';
    const XML_PATH_SECRET_KEY  = 'productattach/aws_s3_storage/secret_key';
    const XML_PATH_BUCKET_NAME = 'productattach/aws_s3_storage/bucket_name';
    const XML_PATH_UPLOAD_DIR  = 'productattach/aws_s3_storage/upload_dir';

    public function getAccessKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ACCESS_KEY, 'store');
    }

    public function getSecretKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SECRET_KEY, 'store');
    }

    public function getBucketName()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_BUCKET_NAME, 'store');
    }

    public function getUploadDir()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_UPLOAD_DIR, 'store');
    }
}

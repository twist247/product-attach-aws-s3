<?php

namespace Prince\Productattach\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class AwsHelper extends AbstractHelper
{
    const XML_PATH_AWS_ACCESS_KEY  = 'productattach/aws_s3_storage/access_key';
    const XML_PATH_AWS_SECRET_KEY  = 'productattach/aws_s3_storage/secret_key';
    const XML_PATH_AWS_BUCKET_NAME = 'productattach/aws_s3_storage/bucket_name';

    public function getAwsAccessKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_AWS_ACCESS_KEY, 'store');
    }

    public function getAwsSecretKey()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_AWS_SECRET_KEY, 'store');
    }

    public function getAwsBucketName()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_AWS_BUCKET_NAME, 'store');
    }
}

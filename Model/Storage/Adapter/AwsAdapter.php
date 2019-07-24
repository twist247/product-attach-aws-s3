<?php

namespace Prince\Productattach\Model\Storage\Adapter;

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Prince\Productattach\Helper\AwsHelper;

class AwsAdapter
{
    /**
     * @var AwsHelper
     */
    private $helper;

    /**
     * @var null|S3Client
     */
    private $client = null;

    /**
     * AwsAdapter constructor.
     * @param AwsHelper $helper
     */
    public function __construct(
        AwsHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param $source
     * @param $destination
     * @return \Aws\Result
     */
    public function uploadFile($source, $destination)
    {
        $client = $this->getClient();
        $result = $client->putObject([
            'Bucket' => $this->helper->getBucketName(),
            'Key' => $destination,
            'SourceFile' => $source,
            'ACL' => 'public-read'
        ]);

        return $result;
    }

    /**
     * Get AWS S3 Client
     *
     * @return S3Client
     */
    public function getClient()
    {
        if ($this->client === null) {
            $this->initCredentials();
            $this->client = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2'
            ]);
        }

        return $this->client;
    }

    /**
     * Init AWS S3 credentials
     */
    private function initCredentials()
    {
        if (!getenv(CredentialProvider::ENV_KEY)) {
            putenv(CredentialProvider::ENV_KEY . '=' . $this->helper->getAccessKey());
        }
        if (!getenv(CredentialProvider::ENV_SECRET)) {
            putenv(CredentialProvider::ENV_SECRET . '=' . $this->helper->getSecretKey());
        }
    }
}

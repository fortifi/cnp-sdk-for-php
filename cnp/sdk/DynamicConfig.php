<?php
namespace cnp\sdk;

class DynamicConfig
{

  /** @var array */
  private static $config = [
    'user'                    => '',
    'password'                => '',
    'merchantId'              => '',
    'timeout'                 => '500',
    'proxy'                   => '',
    'reportGroup'             => 'Default Report Group',
    'version'                 => '12.7',
    'url'                     => '',
    'cnp_requests_path'       => '',
    'batch_requests_path'     => '',
    'sftp_username'           => '',
    'sftp_password'           => '',
    'batch_url'               => '',
    'tcp_port'                => '',
    'tcp_ssl'                 => '1',
    'tcp_timeout'             => '',
    'print_xml'               => '0',
    'vantivPublicKeyID'       => '',
    'gpgPassphrase'           => '',
    'useEncryption'           => '',
    'deleteBatchFiles'        => '',
    'multiSite'               => '',
    'multiSiteErrorThreshold' => '5',
    'maxHoursWithoutSwitch'   => '48',
    'printMultiSiteDebug'     => '',
    'multiSiteUrl1'           => '',
    'multiSiteUrl2'           => '',
  ];

  private static $env = [
    "sandbox"             => 'https://www.testvantivcnp.com/sandbox/communicator/online',
    "postlive"            => "https://payments.vantivpostlive.com/vap/communicator/online",
    "transact-postlive"   => "https://transact.vantivpostlive.com/vap/communicator/online",
    "production"          => "https://payments.vantivcnp.com/vap/communicator/online",
    "production-transact" => "https://transact.vantivcnp.com/vap/communicator/online",
    "prelive"             => "https://payments.vantivprelive.com/vap/communicator/online",
    "transact-prelive"    => "https://transact.vantivprelive.com/vap/communicator/online",
  ];

  /**
   * @param string $username
   * @param string $password
   * @param string $merchantID
   * @param string $mode
   *
   * @throws \Exception
   */
  public static function setConfig($username, $password, $merchantID, $mode)
  {
    self::$config['user'] = $username;
    self::$config['password'] = $password;
    self::$config['merchantId'] = $merchantID;
    if(isset(self::$env[$mode]))
    {
      self::$config['url'] = self::$env[$mode];
    }
    else
    {
      throw new \Exception(
        "mode: $mode does not exist in vantiv configuration"
      );
    }
  }

  public static function getConfig()
  {
    return self::$config;
  }

}

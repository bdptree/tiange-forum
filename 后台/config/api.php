<?php

return [
    // token过期时间
    'token_expire'=>0,
    // 阿里大于
    'aliSMS'=>[
        'isopen'=> false,//开启阿里大于
        'accessKeyId'=>'<accessKeyId>',
        'accessSecret'=>'<accessSecret>',
        'regionId'=>'cn-hangzhou',
        'product'=>'Dysmsapi',
        'version'=>'2017-05-25',
        'SignName'=>'<YourSignName>',
        'TemplateCode'=>'<YourTemplateCode>',
        // 验证码有效期
        'expire'=>60
    ],
  	// 微信小程序
    'wx'=>[
        'appid'=>'wxc91fab2212c4b6f5',
        'secret'=>'7fda955560a7a9c98cd47fa9013c0089'
    ],
  	// 支付宝小程序
    'alipay'=>[
        'appid'=>'2019031963566541',
        // 私钥
        'PrivateKey'=>'MIIEpAIBAAKCAQEA7SAtBYvoWFid1ZRiEyvzjDY7MUBNf8T6AQnFtpYRegE6RfmxViD9Vtmwe//tEF2NquM6sJABefumswqxqM24aE2iFsr2ebXYzL/RGeM6pKGCqFT/Ori1+BUzQCZqVEGzVmwRbg1vNMwXPTTsgudeCtnSdYccpyQv4oTt3sVCz/MxUINFCtOweQFzolbD2oIExPK7lfPc4msEdg49c8YCrjV+PnFQ5VKmIb786dOj9Io1y6kvp3IHxOIs3hgknXmXgP+zPWB0G8v/jRVad/iCgoDEPyZrCO+/cF0BcFx4yutUVENqJI9qNyMQyu34Vmlg5moUoHr2NmzLhQH9rUtBZQIDAQABAoIBAQCPvmGMazN92rpTLpAFby9EX9uiD4jrW0zyNCpWdMJDY1sf8C1AON9aNrx1br8WnJ+0Z+q7/Y/nklWLU4A/A/Y1xFnt1ztyrHmwJNdtCgISqpW51UyjHDWzHabjzGXIjctZKEmonRw8tTuhLuPwtrCbg0/BTxZfe+BLQKmx0YKe63LPXXqLoAEIyR+wuuHGvDZmFEBXpIznEXBdsk6hJlQPcKX80wExUCbKXKteHV4aNuklTGPnNezl938yjTJVfys7fqwg0mISrgu3i8rVz//stbEe4JLyOlHov9CJZweJon8is0eOJuKr+TyafIpbd0O+7i/pBq687gLX99UKjfxBAoGBAPivu+J8Lgq/HQ2M7kMpSFNkWcrBNZh1+2O00EHq70+9QzMFVEZ8QO1o885V2i9Hc+cIAgiah7tOfUxMUa6FRisoxMtLaR9DQfDhKos7ySl7xUM9W3WH8nduPMK86Wq8g+jvfRD9RRf0JqISyHR6rKyRr5ycwQs+qYsG8AC2WueHAoGBAPQZZ78VVQs5XN6LmNdJamAEDBAzQWHwUCJbxf8e7AHhJENM9Dm0vJxnhxkqpuVre4gCgklBviUatXgQM034igX/6Wg0yQU4HPyXw52iFQUfiynbbaQJNBq6JnlowWfaYFokbJWPveRwyhBbmx9If5IPvcaH9mNd2o3iAnBsJTKzAoGAJHJ1AeObR93snyDJhrRVMkuh0VJxzW91MY69evu4qSIe6CpeyJnLVkAsg1AX0xgQx4pn6eTkAbKmMHl6+y3zM74c4YKi3H8Z+fi2KIPRnq/SIGGsttP+2Dwi0ZOoTglk982pscS8zJ7uzpAcKt4T0pLjfvuGW2SKqqKQqDoRpp8CgYB2Ihlwg71tuiw00/B7OF+P6kWATZ317RyLFEklZ+ymGDS5kXOcvdiOBRh/2IF/BF57e2NcWsHQKTXrzkNWF9OMhcaLFQi4SujUYgpcroVnvlVWQ4izW3To/nACT+1R+oCo/3nBhBhNhzxzYDIZmLeMk6uvejuG6XQNOHUfvWbfOwKBgQCANKL+RBWM4NGkiJaQ9CMKYpKMU8O878DuKgaDjw8eE6bVreoK5rpGPYeVsxt89ttIGg1MB02fLDygQtVo4PhY9D+TIuchQW9axZ1N1rQDnbeIqwlpNQBL0TnPtnDmBbE25033BD5JCS/3miTZ89gMcnFCLhUk587bVKM4tO1CRg==',
        // 公钥
        'PublicKey'=>'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAt/RArwe6fRo8PljuUKUfqhRo8mJWnrNu0s83sOxRAOoR0wHTIz6N/83fpM0nP+NPZ4yNLCfyV8DUeIoudpvblSc1K7rpS5XACABp0MRzds8hG0quhUMdKmS42wosynH/GmhtOvQPYshMBYyBQAx3r5+F8XKK5RqAOfWjjSSr9NM6ipfyoiGEJVo6UXqgJRUjSECdiZfMskkv4QnxPF2Amw5Ns9GOCNABq+yAnE2ibnR8PjQwjmHWYih4pJ3RwcNWP2+vucWbbKytxsmDdbHWWEQHtH/Q22DHFKi/+hekZMB3x9gvCCy5lTMvGx1jHtIzFsfZwGXL4H8Ipgu51/anbQIDAQAB',
    ]
];
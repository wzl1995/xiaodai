<?php

final class Config
{

// 域名前缀：https://api.ibeesaas.com/daas/v1
// $appkey="dcxadyh4kp";

// $ak="SHmSJHhvDaq5bY33Bpiz1mDOZHbwQQjp";

// $sk="ciNoa4SPUIMWVvq7k6y19HnbD4AYT9eO";
//  https://tenant.51datakey.com/carrier/mxreport_data?data=aX92rOy5T07S%2BEtFlbPQ%2FseHE0GSf1PF2JI2kz45PNpwmmvN7e2Q2P5Xt61V%2BBDa4CpJMSOu7mvtz%2BG0MlDAqWUYgKKZTTTNxKuVxE3NAJywle%2F9EIrYlfZ8Rz2yN5jaFwERAiy5Sr2xyEgEqRtlwvj9nltXBoXY%2FxZbRq9PHARFR38JaBGsrntSJ6pSAY%2BK&contact=&pdfFlag=0
    const APPKEY =      'dcxadyh4kp'; //'APPKEY'; //TODO:填入云蜂科技分配的Appkey
    const ACCESSKEY =  'SHmSJHhvDaq5bY33Bpiz1mDOZHbwQQjp';// 'AK'; //TODO:填入云蜂科技分配的ak
    const SECRETKEY =  'ciNoa4SPUIMWVvq7k6y19HnbD4AYT9eO';//'SK'; //TODO:填入云蜂科技分配的sk，请务必安全保管该值

    const TOKENVERSION = 'v2';
    // const HOST = 'testapi.ibeesaas.com'; //测试环境URL
    const HOST = 'api.ibeesaas.com'; //正式环境URL

    const URLPATH_PREFIX = "/daas/v1/tasks";

    const TYPE_CARRIER = "carrier"; //运营商
    const TYPE_TAOBAO = "taobao"; //淘宝
    const TYPE_INSURANCE = "insurance"; //社保
    const TYPE_ELEMENT4 = "element4";//银行卡实名认证
    const TYPE_ELEMENT3 = "element3";//手机实名认证
    const TYPE_BLACK = "black"; //网贷黑名单
    const TYPE_PBC = "pbc";//人行征信报告
    const TYPE_FUND = "fund";//公积金
    const TYPE_ALIPAY = "alipay";//支付宝
    const TYPE_EMAILBILL = "email_bill";//邮箱账单
    const TYPE_BANK = "bank";//网银
    const TYPE_EDUCATION = "education";//学历
    const TYPE_RESUME = "resume";//简历
    const TYPE_MAIMAI = "maimai";//脉脉
    const TYPE_WEIBO = "weibo";//微博
    const TYPE_BAIDU = "baidu";//百度
    const TYPE_JD = "jd";//京东
    const TYPE_BLACKCOURT = "blackcourt";//高法黑名单
    const TYPE_BLACKCRIME = "blackcrime";//犯罪记录黑名单
}

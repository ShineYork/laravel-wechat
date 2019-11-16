<?php

namespace ShineYork\LaravelWechat\Http\Middleware;

use Closure;

// 中间件的目的是进行校验
class SWeChatCheck
{
    public function handle($request, Closure $next)
    {
        $signature = $request->input('signature');
        $timestamp = $request->input('timestamp');
        $nonce     = $request->input('nonce');
        // 手动新增的参数
        // 只有在第一次对接的时候才会存在
        // 因此可以根据这个参数来判断是否之前校验过
        $echostr   = $request->input('echostr');

        // 加密过程
        $token = "shineyork";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);$tmpStr = implode( $tmpArr );$tmpStr = sha1( $tmpStr );

        // 加密的判断
        if( $tmpStr == $signature ){
            // 额外修改的代码
            if (empty($echostr)) { // 加密成功之后输出的判断
                return $next($request);
            } else {
                return response($echostr);
            }
        }else{
            return response(false);
        }
    }
}

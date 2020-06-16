<?php

//获取登陆用户信息
function get_auth_user($field = '')
{
    $userInfo = auth('api')->user();
    if (!$field) {
        return $userInfo;
    }
    if (is_array($field)) {
        $returnData = [];
        foreach ($field as $value) {
            $returnData[$value] = isset($userInfo[$value]) ? $userInfo[$value] : '';
        }
        return $returnData;
    } else {
        return isset($userInfo[$field]) ? $userInfo[$field] : '';
    }
}
//请求成功
function success($message = '', $data = '')
{
    return response()->json([
        'status_code' => 200,
        'message' => $message,
        'data' => $data
    ]);
}
//请求失败
function error($status, $message = '', $data = '')
{
    return response()->json([
        'status_code' => $status,
        'message' => $message,
        'data' => $data
    ]);
}

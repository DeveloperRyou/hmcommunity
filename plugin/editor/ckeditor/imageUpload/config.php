<?php
include_once("_common.php");

if(strpos($config['cf_editor'], 'ckeditor') === false ){
    exit;
}

// ---------------------------------------------------------------------------

# 이미지가 저장될 디렉토리의 전체 경로를 설정합니다.
# 끝에 슬래쉬(/)는 붙이지 않습니다.
# 주의: 이 경로의 접근 권한은 쓰기, 읽기가 가능하도록 설정해 주십시오.

# data/editor 디렉토리가 없는 경우가 있을수 있으므로 디렉토리를 생성하는 코드를 추가함. kagla 140305

@mkdir(G5_DATA_PATH.'/'.G5_EDITOR_DIR, G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH.'/'.G5_EDITOR_DIR, G5_DIR_PERMISSION);

$ym = date('ym', G5_SERVER_TIME);

$data_dir = G5_DATA_PATH.'/'.G5_EDITOR_DIR.'/'.$ym;
$data_url = G5_DATA_URL.'/'.G5_EDITOR_DIR.'/'.$ym;

define("SAVE_DIR", $data_dir);

@mkdir(SAVE_DIR, G5_DIR_PERMISSION);
@chmod(SAVE_DIR, G5_DIR_PERMISSION);

# 위에서 설정한 'SAVE_DIR'의 URL을 설정합니다.
# 끝에 슬래쉬(/)는 붙이지 않습니다.

define("SAVE_URL", $data_url);

function cke_get_user_id ()
{
    @session_start();
    return session_id();
}

function cke_get_file_passname ()
{
    $tmp_name = cke_get_user_id().$_SERVER['REMOTE_ADDR'];
    $tmp_name = md5(sha1($tmp_name));
    return $tmp_name;
}

function cke_generateRandomString ($length = 4)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function cke_replace_filename ($filename)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $random_str = cke_generateRandomString(4);
    $passname = cke_get_file_passname();
    $file_arr = date("YmdHis", time());
    return $file_arr.'_'.$passname.'_'.$random_str.'.'.$ext;
}
?>
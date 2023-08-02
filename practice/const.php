<?php
    class SocialLogin {
        private static $googleApi = "218084976710-ikp6t5eio1qag7ui9ae0lkvrkb0p1mtq.apps.googleusercontent.com"; //private === const
        private static $googleClientSecret = "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"; //private === const , 정적

        private static $redirectUrl = "http://localhost:8000/practice/social_login.php"; // 리다이렉트 위치 지정

        static public function socialLoginUrl($loginState){
            //로그인 구분 인자
            // class는 class 끼리 instance 는 instance 끼리
    
            switch($loginState){
                case "google":
                    return 'https://accounts.google.com/o/oauth2/v2/auth?client_id='.self::$googleApi.'&redirect_uri='.self::$redirectUrl.'&response_type=code&state=google&scope=https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile&access_type=offline&prompt=consent';
                // case "kakao":
                //     return 'https://kauth.kakao.com/oauth/authorize?client_id='.self::$kakaoApi.'&redirect_uri='.self::$redirectUrl.'&response_type=code&state=kakao&prompt=login';
                // case "naver":
                //     return 'https://nid.naver.com/oauth2.0/authorize?client_id='.self::$naverApi.'&redirect_uri='.self::$redirectUrl.'&response_type=code&state=naver';
                default:
                    return "";
            }
        }
        // static public function getKakaoApi(){
        //     return self::$kakaoApi;
        // }
    
        static public function getGoogleApi(){
            return self::$googleApi;
        }
    
        // static public function getNaverApi(){
        //     return self::$naverApi;
        // }
    
        static public function getRedirectUrl(){
            return self::$redirectUrl;
        }
    
        static public function getGoogleClientSecret(){
            return self::$googleClientSecret;
        }
    
        // static public function getNaverClientSecret(){
        //     return self::$naverClientSecret;
        // }
    
    
        
    }

    


?>
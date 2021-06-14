<?php
if(!function_exists('direction')){
    function direction(){
        if(session()->has('locale')){
            if(session('locale') == 'ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}

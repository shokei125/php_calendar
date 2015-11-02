$(function(){
	var para = get_para();
	var box = $('#mes_box');
	if(para){
		var texts;
		switch(para.mes){
			case '0': texts = 'ファイルを正常にアップしました。';break;
			case '1': texts = '変更は保存しました。';break;
			case '2': texts = '保存失敗しました。';break;
			default: texts = '未知のエラーです。';break;
		}
		switch(para.error_flg){
			case '1': text = '日付のエラー';break;
		}
		box.text(texts).show().css('color','red').animate({opacity: 0},2000,null,box_hide);
	}
})

function box_hide(){
	$('#mes_box').hide();
}

function get_para(){
	var url = location.href;
	var para = url.split('?');
	if(para[1]){
		var params = para[1].split('&');
		var paramArray = [];
		params.some(function(val,index){
			tmp = val.split('=');
			paramArray[tmp[0]] = tmp[1];	
		});
	}
	return paramArray;
}



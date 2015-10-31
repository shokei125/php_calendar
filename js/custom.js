$(function(){
	var para = get_para();
	var box = $('#mes_box');
	if(para){
		switch(para.mes){
			case '0': box.text('ファイルを正常にアップしました。');break;
			case '1': box.text('変更は保存しました。');break;
			case '2': box.text('保存失敗しました。');break;
			default: box.text('未知のエラーです。');break;
		}
		box.show().css('color','red').animate({opacity: 0},2000);
	}
})

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



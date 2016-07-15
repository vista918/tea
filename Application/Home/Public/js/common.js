(function($){

	// ��Date����չ���� Date ת��Ϊָ����ʽ��String
	// ��(M)����(d)��Сʱ(h)����(m)����(s)������(q) ������ 1-2 ��ռλ���� 
	// ��(y)������ 1-4 ��ռλ��������(S)ֻ���� 1 ��ռλ��(�� 1-3 λ������) 
	// ���ӣ� 
	// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
	// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
	Date.prototype.format = function (fmt) { //author: meizz 
		var o = {
			"M+": this.getMonth() + 1, //�·� 
			"d+": this.getDate(), //�� 
			"h+": this.getHours(), //Сʱ 
			"m+": this.getMinutes(), //�� 
			"s+": this.getSeconds(), //�� 
			"q+": Math.floor((this.getMonth() + 3) / 3), //���� 
			"S": this.getMilliseconds() //���� 
		};
		if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
		for (var k in o)
		if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		return fmt;
	}
	
	Date.prototype.addDays = function(d)
	{
		this.setDate(this.getDate() + d);
	};

	Date.prototype.addWeeks = function(w)
	{
		this.addDays(w * 7);
	};

	Date.prototype.addMonths= function(m)
	{
		var d = this.getDate();
		this.setMonth(this.getMonth() + m);
		if (this.getDate() < d)
			this.setDate(0);
	};

	Date.prototype.addYears = function(y)
	{
		var m = this.getMonth();
		this.setFullYear(this.getFullYear() + y);
		if (m < this.getMonth())
		{
			this.setDate(0);
		}
	};
		
})(jQuery);

var total_digital_chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

function generateMixed(n) {
	 var res = "";
	 for(var i = 0; i < n ; i ++) {
		 var id = Math.floor(Math.random()*62);
		 res += total_digital_chars[id];
	 }
	 return res;
}
	
function getCurTimeStr() {
	var newDate = new Date();
	return newDate.format("yyyy-MM-dd hh:mm:ss");
}

function getLocalTime(days) {
	var newDate = new Date();
	newDate.addDays(days);
	return newDate.getTime()/1000;
}

function getTimeStr(days) {
	var newDate = new Date();
	newDate.addDays(days);
	return newDate.format("yyyy-MM-dd hh:mm:ss");
}
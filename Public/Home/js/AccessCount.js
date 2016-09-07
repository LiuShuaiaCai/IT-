
//访问统计

function AccessCount()
{
    //WebsiteIndex:网站索引  null/0:陶瓷官网 , 1:红玫瑰  2:唐淘
    this.save = function(WebsiteIndex)
    {
        if (WebsiteIndex == undefined)
        {
            WebsiteIndex = 0;
        }
        
        $.ajax(
		{
// 		    url: "http://172.16.3.220:81/BackManager/BrowseLogSave",
		    url: "http://www.ccia086.com/BackManager/BrowseLogSave",
		    data:
			{
			    Title: document.title,
			    Href: location.href,
			    HrefFrom: document.referrer,
			    WebsiteIndex: WebsiteIndex
			},
			type: "get", //jquey是不支持post方式跨域的
			dataType: "jsonp",
			jsonp: "jsoncallback", //传递给请求处理程序，用以获得jsonp回调函数名的参数名(默认为:callback)
			jsonpCallback: "success_jsonpCallback", //自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名 
			//成功获取跨域服务器上的json数据后,会动态执行这个callback函数 
//			success: function(json)
//			{

//			    alert(json);
//			}, 

		    cache: false
		});
    }
}

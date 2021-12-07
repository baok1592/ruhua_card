const CONFIG = {
    // 开发环境配置
    development: {
        //
		 //Api_url:"/../"
		 Api_url:"http://192.168.0.184:8098/",
		 //Api_url:"http://card.ruhuashop.com/",
    },
    // 生产环境配置
    production: {
        Api_url:"/../"
    } 
	

};
export default CONFIG[process.env.NODE_ENV];

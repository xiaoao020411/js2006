function getDate(seconds){
    // console.log(seconds)
    // console.log(111)
    
    //天
    var d = seconds / 86400
    d = Math.floor(d)
    //console.log(d)
    //小时
    var h = seconds / 3600
    h = Math.floor(h) % 24
    //console.log(h)
    //分钟
    var i = seconds / 60
    i = Math.floor(i) % 60
    //console.log(i)
    //秒
    var s = seconds % 60 
    
    //console.log(s)
    var str = d + "天" + h + "小时" + i + "分钟" + s + "秒"
    //console.log(str)
    return str
}
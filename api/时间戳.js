setInterval(function () {
    var t = new Date()
    var year = t.getFullYear()//年
    //console.log(year)
    var month = t.getMonth() + 1//月
    //console.log(month)
    var day = t.getDate()//日
    // console.log(day)
    var hour = t.getHours()//时
    if(hour<10){
        hour='0'+hour
    }
    var utcdata = t.getUTCDay()
    //console.log(utcdata)
    //console.log(hour)
    var minute = t.getMinutes()//分
    if(minute<10){
        minute='0'+minute
    }
    //console.log(minute)
    var second = t.getSeconds()//秒
    if(second<10){
        second='0'+second
    }
    //console.log(second)


    var ymdhis = year + '-' + month + '-' + day + '-' + hour + '-' + minute + '-' + second
    // console.log(ymdhis)
    var utc = '周' + utcdata
    document.getElementById('date').innerText = ymdhis
    document.getElementById('utc').innerText = utc
}, 1000)

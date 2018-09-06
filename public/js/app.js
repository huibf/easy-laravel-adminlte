function cl(data) {
    console.log(data);
}

function isEmpty(data) {
    if (data == '' || data == null || data == undefined) {
        return true;
    } else {
        return false;
    }
}

function strPad(str, n, padStr) {
    var len = str.toString().length;
    while(len < n) {
        str = padStr + str;
        len++;
    }
    return str;
}

function subDays(inputDate, type, days) {
    var date = new Date(inputDate);
    if (days == undefined) {
        days = 1
    }
    if (type == '+') {
        date.setDate(date.getDate() + days); // set date add .. days
    } else {
        date.setDate(date.getDate() - days); // set date sub .. days
    }
    month = date.getMonth() + 1;
    return date.getFullYear() + '-' + strPad(month, 2, '0') + '-' + strPad(date.getDate(), 2, '0');
}

var weekDefinedArray = ['日', '月', '火', '水', '木', '金', '土'];
function getWeek(dateObject) {
    weekNum = dateObject.getDay();
    return weekDefinedArray[weekNum];
}

var today = new Date();
var todayDateString = today.getFullYear() + '年' + (today.getMonth() + 1) + '月' + today.getDate() + '日' + '(' + getWeek(today) + ')';
var todayDateFormat = today.getFullYear() + '-' + strPad((today.getMonth() + 1), 2, '0') + '-' + strPad(today.getDate(), 2, '0');

var color = {
    white:"#FFFFFF",
    skyBlue:"#B4D3EF", //#87CEEB
    blue:"#3C8ABC", 
    deepBlue:"#3333FF",
    cyan:"#00FFFF",
    gray:"#D2D2D2",
    red:"#FF0066",
    bloodRed:"#FF0000",
    orange:"#FF6600",
    lightOrange:"#FFE4B5",
    green:"#00A65A",
    black:"#000000",
    pink:"#EF4ACD",
    grey:"#CCCCCC",
    fuchsia:"#FF00FF",
    lime:"#00FF00",
    yellow:"#FFFF00",
    silver:"#C0C0C0",
    brown:"#CC9900",
    blueviolet:"#CC00CC",
    forestgreen:"#009900",
    darkgray:"#666666"
};

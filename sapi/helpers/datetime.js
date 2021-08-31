const daysInMonth = function(month, year) {
    return new Date(year, month, 0).getDate();
}

const calculateDateDiff = function(targetDate, years=0, months=0, datas=0) {
    const currYear = targetDate.getFullYear(),
    currMonth = targetDate.getMonth(),
    currDay = targetDate.getDate(),
    currMonthDays = daysInMonth(currMonth, currYear);

    let targetYear = currDay,
    targetMonth = currMonth,
    targetDay = currDay;

    if(years>0) {
        targetYear += years;
    }
    if(months>0) {
        targetMonth += months;
        if(targetMonth>11) targetMonth = targetMonth % 11;
    }
    if(datas>0) {
        targetDay = datas;
        if(targetDay>currMonthDays) {
            targetDay = targetDay % currMonthDays;
        }
    }

    return new Date(targetYear, targetMonth, targetDay);
}

module.exports = {
    daysInMonth,
    calculateDateDiff
}
var ratio;
var totalRatio;
var total;
var added;
var colors;
var sings;
var buttons;
var timer;


function loadQ() {
    ratio = getRatio();
    totalRatio = getSumRatio(ratio);
    buttons = document.getElementsByClassName('buttons');
    sings = document.getElementsByClassName("signs");
    total = document.getElementById('total');
    added = document.getElementsByClassName('added');
    colors = document.getElementsByClassName('colors');
    for (i = 0; i < colors.length; i++) {
        sings[i].innerHTML = "+";
        colors[i].value = (1000 * ((total.value * ratio[i]) / totalRatio)).toFixed(2);
    }
}

function getRatio() {
    rat = document.getElementById('ratio').innerHTML;
    rat = rat.split(':');
    return rat;
}

function getSumRatio(x) {
    var y = 0;
    x.forEach((element) => {
        y += parseFloat(element);
    });
    return y;
}

function calc(trigger) {
    var index;
    for (var i = 0; i < colors.length; i++) {
        if (added[i] == trigger) {
            index = i;
        }
    }
    var needed = (1000 * (parseFloat(total.value * (ratio[index] / totalRatio)))).toFixed(0);
    if (parseFloat(added[index].value) > parseFloat(needed)) {
        total.value = ((added[index].value / (ratio[index] / totalRatio)) / 1000).toFixed(2);
        changeTotal(total);
    } else {
        changeTotal(total);
    }
}

function changeTotal(trigger) {
    var dif;
    var needed;
    for (i = 0; i < colors.length; i++) {
        needed = (1000 * (parseFloat(total.value * (ratio[i] / totalRatio)))).toFixed(0);
        dif = calcDifference(parseFloat(added[i].value), parseFloat(needed));
        colors[i].value = dif[1];
    }
}

function calcDifference(added, needed) {
    var sign = "+";
    var difference = 0;
    if (added < needed) {
        difference = needed - added;
    }
    return [sign, difference];
}

function incr(trigger) {
    var index;
    for (var i = 0; i < colors.length; i++) {
        if (buttons[i] == trigger) {
            index = i;
        }
    }
    added[index].value = parseFloat(added[index].value) + parseFloat(100);
    var event = new Event('change');
    added[index].dispatchEvent(event);
}


function clickLongPress(trigger) {
    timer = setInterval(() => { incr(trigger) }, 100);
}

function unclickLongPress(trigger) {
    clearInterval(timer);
}

$(function () {
    var date_input = $('.date-mask');
    date_input.mask('00/00/0000');

    var money = $('.money-format');
    money.mask("#.##0,00", {reverse: true});
    
    var telephone_mask = $('.telephone');
    telephone_mask.mask('(99) 90000-0000');
});
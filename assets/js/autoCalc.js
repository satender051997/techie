function autoCalcSetup()
{
    $('form[name=cart]').jAutoCalc('distroy');
    $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces:2, emptyZero:true});
    $('form[name=cart]').jAutoCalc({decimalPlaces:2}); 
}
autoCalcSetup()
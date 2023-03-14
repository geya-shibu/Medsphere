function validateGlucose()
{
    var glucose =document.getElementById('symtomp1');
    if (isNaN(glucose.value)) {
        text="Please enter a valid number";
        document.getElementById('glu_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    //   Check if glucose is within a reasonable range (70-400 mg/dL)
    if (glucose.value < 60 || glucose.value > 400) {
        text="Glucose range between 60 and 400 ";
        document.getElementById('glu_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    // If all checks pass, return true
    else{
        text="";
        document.getElementById('glu_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}

function validatebp()
{
    var bp =document.getElementById('symtomp2');
    if (isNaN(bp.value)) {
        text="Please enter a valid number";
        document.getElementById('bp_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    if (bp.value < 40 || bp.value > 220) {
        text="Blood Pressure range between 40 and 220 ";
        document.getElementById('bp_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    
    else{
        text="";
        document.getElementById('bp_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}

function validateInsulin()
{
    var insulin =document.getElementById('symtomp3');
    if (isNaN(insulin.value)) {
        text="Please enter a valid number";
        document.getElementById('ins_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    if (insulin.value < 0 || insulin.value > 400) {
        text="Insulin range between 0 and 400 ";
        document.getElementById('ins_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    
    else{
        text="";
        document.getElementById('ins_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}

function validatehb()
{
    var hb =document.getElementById('haemoglobin');
    if (isNaN(hb.value)) {
        text="Please enter a valid number";
        document.getElementById('hb_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    if (hb.value < 12 || hb.value > 18) {
        text="Haemoglobin range between 12 and 18 ";
        document.getElementById('hb_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    
    else{
        text="";
        document.getElementById('hb_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}

function validateCholestrol()
{
    var chl =document.getElementById('cholestrol');
    if (isNaN(chl.value)) {
        text="Please enter a valid number";
        document.getElementById('chl_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    if (chl.value < 120 || chl.value > 200) {
        text="Cholestrol range between 120 and 200 ";
        document.getElementById('chl_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    
    else{
        text="";
        document.getElementById('chl_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}

function validateHeartRate()
{
    var hr =document.getElementById('heart_rate');
    if (isNaN(hr.value)) {
        text="Please enter a valid number";
        document.getElementById('hr_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    if (hr.value < 60 || hr.value > 100) {
        text="Heart Rate range between 60 and 100 ";
        document.getElementById('hr_err').innerHTML = text;
        document.getElementById('predict').disabled = true;
        return true; 
    }
    
    else{
        text="";
        document.getElementById('hr_err').innerHTML = text;
        document.getElementById('predict').disabled = false;
        return false;
    }
}
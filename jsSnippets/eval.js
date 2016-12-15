function eval_success()
{
	console.log("success");
}

function eval_failure()
{
	console.log("failure");
}


// return the evaluation of the first and third parameter against the sign of comparision.
function eval_required(value, comparision_operator, value_to_compare)
{
	var functions_for_number = {
	    '==' : function(value,value_to_compare) { return value ==  value_to_compare },
	    '<' : function(value,value_to_compare) { return value < value_to_compare },
	    '>' : function(value,value_to_compare) { return value > value_to_compare },
	    '<=' : function(value,value_to_compare) { return value <=  value_to_compare },
		'>=' : function(value,value_to_compare) { return value >=  value_to_compare },
		'===' : function(value,value_to_compare) { return new RegExp(value_to_compare).test(value) }
	};

	var functions_for_string = {
		'==' : function(value,value_to_compare) { return new RegExp("^"+value_to_compare+"$").test(value) },
		'===' : function(value,value_to_compare) { return new RegExp(value_to_compare).test(value) },
		'<' : function() {return "nothing"},
	    '>' : function() {return "nothing"},
	    '<=' : function() {return "nothing"},
		'>=' : function() {return "nothing"}
	};

	// Is a numner?
	if (!isNaN(value) && !isNaN(value_to_compare)) 
	{
		// process it!
		if (functions_for_number[comparision_operator](value,value_to_compare))
		{
			eval_success.call(this);
		}
		else
		{
			eval_failure.call(this);
		}
	}
	else
	{
		if (functions_for_string[comparision_operator](value,value_to_compare) == 1)
		{
			eval_success.call(this);
		}
		else if (functions_for_string[comparision_operator](value,value_to_compare) == 0)
		{
			eval_failure.call(this);
		}
	}
}

eval_required(12,'==',12);


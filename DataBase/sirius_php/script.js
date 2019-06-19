var button = document.getElementById("button");
var plan = document.getElementById("plan_sum");
var fact = document.getElementById("fact_sum");
	
button.onclick = function(){
	var fact_sum = +Fact_sum;
	for (var i = 0; i < 12; i++){
		var input = +document.getElementById(i).value;
		fact_sum = fact_sum + input;
	}
	
	plan.innerHTML = plan_sum + " рублей";
	fact.innerHTML = fact_sum + " рублей";
}
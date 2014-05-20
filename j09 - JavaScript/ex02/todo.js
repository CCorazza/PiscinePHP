var list = document.getElementById('ft_list');
var cook;

function setCookie(){
	document.cookie= ;
}


function display(){
		var num1 = new Number(document.getElementById('input1').value);
		var num2 = new Number(document.getElementById('input2').value);
		var opp = document.getElementById("opp").value;
		var Overall;
		var string = num1 + ' ' + opp + ' ' + num2;

		if (isInt(num1) && isInt(num2) && num1 >= 0 && num2 >= 0)
		{
			document.getElementById('operation').innerHTML = string;

			if ( (opp == '/' || opp == '%') && num2 == '0' )
			{
				Overall = "IT\'S OVER 9000 !";
				alert(Overall);
				console.log(Overall);
			} 
			else 
			{
			Overall = eval(string);
			alert(Overall);
			console.log(Overall);
			document.getElementById('result').innerHTML = Overall;
			}
		}
		else
		{
			Overall = "Error :("
			alert(Overall);
			console.log(Overall);
			document.getElementById('result').innerHTML = Overall;
		}
	}

	function isInt(n)
	{
		return n % 1 === 0;
	}
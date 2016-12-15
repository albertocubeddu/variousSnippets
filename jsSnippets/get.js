var $_GET = {},
    args = location.search.substr(1).split(/&/);
	for (var i=0; i<args.length; ++i) {
    	var arg = args[i].split(/=/);
   		if (arg[0] != "") {
        	$_GET[(arg[0])] = (arg.slice(1).join("").replace("+", " "));
    }
}	

/*
location.search => the string that we are looking for plus ? (get parameters)
split tmp between the '='
		tmp[0] = key
		tmp[1] = value
		slice(1) just the value 
		join -> convert in string
		replace -> the + are the space in the uri so we transform in real space..
*/ 
function load_data(){
 	$.ajax({
 		type: "POST",
        url: "php/researchDataOperations.php",
        data: {type:"listResearchData"},
        dataType: "json",
        success:function(data){
            update(data);
           
        }
 	});
 }

 function quickSearch()
{  
    var query = document.getElementById("searchData").value;

    $.ajax({
        type:"POST",
        url:"php/researchDataOperations.php",
        data: {type:"QsearchData",query:query},
        dataType: "json",
        success:function(data){
            alert(data);
            update(data);        
        }
    });
}
 
function update(data)
{
    var id,mainkw,otherkw,name,QTY,sampleCost,totalCost,estProfit,FBA,MOQ,life_cycle;

    var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
    var tbody = document.createElement('tbody');
    var table = document.getElementById("dTable");


    for (var i = 0; i < data.length; i++) {
        row = data[i];

        id = row.ResultId;
        mainkw = getMainKW(id);
        otherkw = getOtherKW(id);
        name = row.productName;
        QTY = row.QTY;
        sampleCost = row.sampleCost;
        totalCost = row.totalCost;
        estProfit = row.estProfit;
        FBA = row.FBA_fees;
        MOQ = row.MOQ;
        life_cycle = row.life_cycle;
        
        append_table(tbody,id,mainkw,otherkw,name,QTY,sampleCost,totalCost,estProfit,FBA,MOQ,life_cycle);
    }
    table.replaceChild(tbody,old_tbody);
}
 function append_table(tbody,id,mainkw,otherkw,name,QTY,sampleCost,totalCost,estProfit,FBA,MOQ,life_cycle)
 {

 	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = id;
 	cell.style.display = "none";

 	var cell1 = row.insertCell(1);
    var link = document.createElement("a");
   link.setAttribute("href", "showResearchData.php?reseach_id="+id );
   var linkText = document.createTextNode(name);
    link.appendChild(linkText);
    cell1.appendChild(link);
 	//cell1.innerHTML = name;

 	var cell2 = row.insertCell(2);
 	cell2.innerHTML = mainkw;

 	var cell3 = row.insertCell(3);
 	cell3.innerHTML = otherkw;

 	var cell4 = row.insertCell(4);
 	cell4.innerHTML = QTY;

 	var cell5 = row.insertCell(5);
 	cell5.innerHTML = sampleCost;

 	var cell6 = row.insertCell(6);
 	cell6.innerHTML =totalCost;

 	var cell7 = row.insertCell(7);
 	cell7.innerHTML =estProfit;

 	var cell8 = row.insertCell(8);
 	cell8.innerHTML =FBA;

 	var cell9 = row.insertCell(9);
 	cell9.innerHTML =MOQ;


 	var cell10 = row.insertCell(10);
 	cell10.innerHTML = estProfit;

    var cell11 = row.insertCell(11);
    cell11.innerHTML = life_cycle;


 	var cell12 = row.insertCell(12);
 	var btn1 = document.createElement('button');
 	btn1.className = "btn btn-info btn-xs";
 	btn1.onclick = function(){	
        viewProduct(id);
 	};
    var temp1 = document.createElement('i');
    temp1.className = "fa fa-pencil-square-o";
    temp1.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell12.appendChild(btn1);

    cell12 = row.insertCell(13);
    btn1 = document.createElement('button');
    btn1.className = "btn btn-info btn-xs";
    btn1.onclick = function(){
       editData(id);
    };
    temp1 = document.createElement('i');
    temp1.className = "fa fa-database";
    temp1.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell12.appendChild(btn1);
 	

 	var cell13 = row.insertCell(14);
 	var btn2 = document.createElement('button');
 	btn2.className = "btn btn-danger btn-xs";
 	btn2.onclick = function(){
 		deleteData(id);
 	};

 	var temp2 = document.createElement('i');
    temp2.className = "fa fa-trash-o";
    temp2.setAttribute("aria-hidden", "true");
  
    btn2.appendChild(temp2);
    cell13.appendChild(btn2);

 }

function viewProduct(id)
{   
    window.location.href = "productList.php?re_id="+id;
}
function editData(id)
{
    
}

function deleteData(id)
{
    $.ajax({
        type: "POST",
        url: "php/researchDataOperations.php",
        dataType: "json",
        data:{type:"deleteResearchData",query:id},
        success: function(data){    
            //window.reload();
            alert(data);
        }

    });
}

 function getOtherKW(ProductId)
{
    var otherkw = "null";
    $.ajax({
        type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        async:false,
        data:{type:"getOtherKW",query:ProductId},
        success: function(data){    
            otherkw= concatOtherKeyword(data);
        }

    });
    return otherkw;
}



function getMainKW(ProductId){
    var kw = "null";
    $.ajax({
        type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        async:false,
        data:{type:"getMainKW",query:ProductId},
        success: function(data){
            kw = data[0].Keyword;
        }

    });
    return kw;
    
}


function concatOtherKeyword(data)
{
    var row;
    var result;
    var temp = ",";


    if(data.length > 0)
        result=data[0].Keyword;

    for(var i= 1; i<data.length;i++)
    {  
        result = result.concat(temp);
        row = data[i];
        result = result.concat(row.Keyword);
    }
    
    return result;
}



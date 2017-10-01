function loadReData()
{
  var url = window.location.href;
  var str = url.split("=");
  var reDataId= str[1];
  load_Researchdata(reDataId);
  load_Competitor(reDataId);

}

function load_Competitor(id)
{
   $.ajax({
    type: "POST",
        url: "php/competitorOperations.php",
        data: {type:"getCompetitorData",id:id},
        dataType: "json",
        success:function(data){
          var row;
          var Id,BrandName,BSR,Sales,Price,Size,LaunchDay,Link,Review,Pros,Cons;
          var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
          var tbody = document.createElement('tbody');
          var table = document.getElementById("dTable");

            for(var i=0; i<data.length;i++)
            {
              row = data[i];
              Id = row.Id;
              BrandName = row.BrandName;
              BSR = row.BSR;
              Sales = row.Sales;
              Price = row.Price;
              Size = row.Size;
              LaunchDay = row.LaunchDay;
              Link = row.Link;
              Review = row.Review;
              Pros = row.Pros;
              Cons = row.Cons;

            
            
            appendProductInfo(tbody,Id,BrandName,BSR,Sales,Price,Size,LaunchDay,Link,Review,Pros,Cons,row.Create_time,row.Creator)
            }
            table.replaceChild(tbody,old_tbody);
        }
      });
}


function appendProductInfo(tbody,Id,BrandName,BSR,Sales,Price,Size,LaunchDay,Link,Review,Pros,Cons,Create_time,Creator)
{
  
  var row = tbody.insertRow(0);

  var cell = row.insertCell(0);
  cell.innerHTML = Id;
  cell.style.display = "none";

  cell = row.insertCell(1);
  cell.innerHTML = BrandName;

  cell = row.insertCell(2);
  cell.innerHTML = BSR;

  cell = row.insertCell(3);
  cell.innerHTML = Sales;

 // cell = row.insertCell(4);
 // cell.innerHTML = Price;

  cell = row.insertCell(4);
  cell.innerHTML = Size;

  cell = row.insertCell(5);
  cell.innerHTML = LaunchDay;

  cell = row.insertCell(6);
  cell.innerHTML = Link;

  cell = row.insertCell(7);
  cell.innerHTML = Review;

  cell = row.insertCell(8);
  cell.innerHTML = Pros;

  cell = row.insertCell(9);
  cell.innerHTML = Cons;

  cell = row.insertCell(10);
  cell.innerHTML = Create_time;

  cell = row.insertCell(11);
  cell.innerHTML = Creator;

  cell = row.insertCell(12);
  var btn = document.createElement('button');
  btn.className = "btn btn-danger btn-xs";
  btn.onclick = function(){
    deleteCompetitor(Id);
  };

  var temp = document.createElement('i');
    temp.className = "fa fa-trash-o";
    temp.setAttribute("aria-hidden", "true");
    btn.appendChild(temp);
    cell.appendChild(btn);

}

function deleteCompetitor(id)
{
  $.ajax({
    type: "POST",
        url: "php/competitorOperations.php",
        data: {type:"deleteCompetitor",id:id},
        dataType: "json",
        success:function(data){
          alert(data);
          location.reload();
        }
      });
}

function load_Researchdata(id){

  $.ajax({
    type: "POST",
        url: "php/researchDataOperations.php",
        data: {type:"getResearchData",id:id},
        dataType: "json",
        success:function(data){
          var row = data[0];
          var element;
          element = document.getElementById('ProName');
          element.innerHTML="<b>Name:</b>"+row.productName;

          element = document.getElementById('AliBusinessCard');
          element.innerHTML="<b>Ali BusinessCard:</b>"+row.AliBusinessCard;

          element = document.getElementById('Seller');
          element.innerHTML="<b>Seller BusinessCard:</b>"+row.Seller;

 element = document.getElementById('BSR');
          element.innerHTML="<b>BSR(90 days):</b>"+row.BSR;

          element = document.getElementById('sellerPrice');
          element.innerHTML="<b>Sale Price:</b>"+row.sellerPrice;

          element = document.getElementById('AliPrice');
          element.innerHTML="<b>Alibaba Price:</b>"+row.AliPrice;

          element = document.getElementById('OtherInfo');
          element.innerHTML="<b>Comments:</b>"+row.OtherInfo;

          element = document.getElementById('FBA_fees');
          element.innerHTML="<b>FBA fees:</b>"+row.FBA_fees;

          element = document.getElementById('Est_profit');
          element.innerHTML="<b>Estimate profit:</b>"+row.estProfit;

          element = document.getElementById('life_cycle');
          element.innerHTML="<b>life cycle:</b>"+row.life_cycle;

           element = document.getElementById('Create_time');
          element.innerHTML="<b>Create time:</b>"+row.Create_time;
       
          element = document.getElementById('reDataId');
          element.value = id;
        }
  });
 }
 
function clickFunction() {
  var modal = document.getElementById('myModal');
    modal.style.display = "block";
}
function closeModal() {
  var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

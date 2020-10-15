$(document).ready(function(){

  //DEO JS koji je namnjene za menjanje prikazivanje i brisanje kategorija 
  //prikazivanje svih kategorija
  $(".select_category_manage").load("allCategories.php", function(response){
    let answer=JSON.parse(response);
    for(i in answer)
    $(".select_category_manage").append("<option value="+answer[i].categories_id+">"+answer[i].category_name+"</option>");
  })

  // stavlja ime kategorije u input formu gde se menja ime
    $("#category_chose").click(function(){
      var category=$(".select_category_manage").val();// ti pravis varijablu ili primenljivu kad stavim VAR 
      if(category!="")
      {
        $.ajax({
          url:"category_manage.php",
          method:'POST',
          data:{category:category},
          success: function(response){
            var answer=JSON.parse(response);
            for(i in answer)
            $("#category_manage").val(answer[i].category_name)
          }
        })
      }
      else{
        alert("niste izabrali kategoriju")
      }
    })
    //menjanje imena kategorije
    $("#category_change").click(function(){
      if($("#category_manage").val()!="")
      {
        if(!confirm("da li ste sigurni da zelite da promenite naziv kategorije?"))
        {
          return false;
        }
        else
        {
          $.post("category_manage.php?funkcija=change", {categories_id: $(".select_category_manage").val(),category_manage: $("#category_manage").val()}, function(response){//kad saljem na ovaj nacin mora da bude kao u bazi
            location.reload();
            alert("Uspesno ste izmenili naziv kategorije!!");
        });  
        }
      }
      else
      {
        alert("Niste izabrali nijednu kategoriju");
      }
    })
    


// prikazivanje proizvoda u selectr meni
$("#product_id").attr("disabled","disabled");
$(".select_products").load("allproducts.php",function(response){
  let answer=JSON.parse(response);
  for(i in answer)
  $(".select_products").append("<option value="+answer[i].id+">"+answer[i].model_number+"</option>");
})

//DEO VEZAN ZA IZMENU PROIZOVDAAA prikazivanje i formu
  $("#product_chose").click(function(){
    var product_id=$('.select_products').val();
    if(product_id!="")
    {
      $.ajax({
        url:"product_manage.php",
        method:'POST',
        data: {product_id:product_id},
        success: function(response){
          var answer=JSON.parse(response);
          for (i in answer)
          $("#product_id").val(answer[i].id);
          $("#model_number").val(answer[i].model_number);
          $("#deparment_name").val(answer[i].deparment_name);
          $("#category").val(answer[i].category_name);
          $("#manufacturer_name").val(answer[i].manufacturer_name);
          $("#upc").val(answer[i].upc);
          $("#sku").val(answer[i].sku);
          $("#regular_price").val(answer[i].regular_price);
          $("#sale_price").val(answer[i].sale_price);
          $("#description").val(answer[i].description);
          $("#url").val(answer[i].url);
        }
      })
    }
    else
    {
      alert("Niste izabrali proizvod");
    }
  })
  //menjane ili brisanje prozivoda
  $("#product_change").click(function(){
    var product_id=$("#product_id").val();
            var description=$("#description").val();
            var model_number=$("#model_number").val();
            var deparment_name=$("#deparment_name").val();
            var category=$("#category").val();
            var manufacturer_name=$("#manufacturer_name").val();
            var upc=$("#upc").val();
            var sku=$("#sku").val();
            var regular_price=$("#regular_price").val();
            var sale_price=$("#sale_price").val();
            var url=$("#url").val();
            if(product_id!="")
            {
              if(!confirm("da li ste sigurni da zelite da izmenite proizvod"))
              {
                return false
              }
              else
              {
                $.ajax({
                  url:"product_manage.php?function=change",
                  method:'POST',
                  data:{product_id:product_id, description:description, model_number:model_number, deparment_name: deparment_name, category:category, manufacturer_name:manufacturer_name, upc:upc, sku:sku, regular_price:regular_price, sale_price:sale_price, url},
                  success: function(response){
                    location.reload();
                    alert("Uspesno ste izmenili proizvod");
                  }

                })
              }
            }
            else
            {
              alert("Niste izabrali proizvod");
            }
  })
  //BRISANJE PROZIVODA
  $("#product_delete").click(function(){
    var product_id=$("#product_id").val()
    if(product_id!="")
    {
      if(!confirm("DA li ste sigurni da zelite da obrisete prozivod"))
      {
        return false
      }
      else
        {
          $.ajax({
            url:" product_manage.php?function=delete",
            method:'POST',
            data:{product_id:product_id},
            success: function(response){
              location.reload();
              alert("uspesno ste obrisali prozivod");
            }
          })
        }
    }
    else
      {
        alert("Nista izabrali prozivod");
      }
  })




  //Prikazivanje  svih proizvoda na index strani
$("#product_search").click(function(){
  $("#product_show").hide();
  $("#allProduct_show").empty();
    $("#loader").show();
      $.ajax({
        url:"allProducts.php",//sa koje stranice poziva php
        methoda:'GET',//metodom kojom poziva
        success:function(response){
          $("#allProduct_show").show();// div u kom pokazuje ono sto trazim
          $("#loader").hide();//kad ucita show da ukloni div loader
           var answer=JSON.parse(response);
           for(i in answer){            
            $("#allProduct_show").append("<div class='col-md-3' style='margin-top: 10px'><div class='card h-100'><div class='card-body'><p class='card-text'><b>products_id :</b> "+answer[i].id+"<br><b>regular_price :</b> "+answer[i].regular_price+"<br><b>sale_price :</b> "+answer[i].sale_price+"<br><b>model_number :</b> "+answer[i].model_number+"<br><b>category_name :</b> "+answer[i].category_name+"<br><b>deparment_name :</b> "+answer[i].deparment_name+"<br><b>manufacturer_name :</b> "+answer[i].manufacturer_name+"<br><b>ups : </b>"+answer[i].upc+"<br><b>sku : </b>"+answer[i].sku+"<br><b>description : </b>"+answer[i].description+"<br><b>url: </b>"+answer[i].url+"</p></div></div></div>")
           }

        }
      })
})




  // funkcija koja prikazuje prozivode po kategoriji
$("#category_search").click(function(){
  $("#allProduct_show").hide();
  $("#product_show").empty();
  var categories_id=$(".select_category").val();
  if(categories_id!="")
  {
    $.ajax({
      url:"category_show.php",
      methoda:'GET',
      data:{categories_id:categories_id},
      success:function(response){
        $("#product_show").show()
        var answer=JSON.parse(response);
        for(i in answer){
          $("#product_show").append("<div class='col-md-4' style='margin-top: 10px'> <div class='card h-100'> <div class='card-body'> <p class='card-text'><b>products_id :</b> "+answer[i].id+"<br><b>regular_price :</b> "+answer[i].regular_price+"<br><b>sale_price :</b> "+answer[i].sale_price+"<br><b>model_number :</b> "+answer[i].model_number+"<br><b>category_name :</b> "+answer[i].category_name+"<br><b>deparment_name :</b> "+answer[i].deparment_name+"<br><b>manufacturer_name :</b> "+answer[i].manufacturer_name+"<br><b>ups : </b>"+answer[i].upc+"<br><b>sku : </b>"+answer[i].sku+"<br><b>description : </b>"+answer[i].description+"<br><b>url: </b>"+answer[i].url+"</p></div></div></div>")
        }
      }
    })
  }
  else
        {
            alert("Niste izabrali nijednu kategoriju");
        } 
});

  //KOnfiguracija za odabir kategorija na index strani
$(".select_category").load("allCategories.php", function(response){
  let answer=JSON.parse(response);
  for(i in answer)
    $(".select_category").append("<option value="+answer[i].categories_id+">"+answer[i].category_name+"</option>");
})
   
//prikaz svih produkta na index strani

//login
$("#logIn").click(function(){
    var username=$("#username").val();
    var password=$("#password").val();
    if(username!="" && password!="")
    {
        $.ajax({
          url:"logIn.php",
          method:"POST",
          data:{username:username, password:password},
          success:function(data){
              if(data == "Email")
              {
                $("#error").append("<div class='text-center text-danger'>Nije ispravna email adresa za korisnika "+username+"</div>");
              }
              else if(data == "Lozinka")
              {
                  $("#error").append("<div class='text-center text-danger'>Pogresna lozinka za korisnika "+username+"</div<");
              }
              else if(data == "Karakter")
              {
                  $("#error").append("<div class='text-center text-danger'>Email adresa ili lozinka sadrže nedozvoljene karaktere</div>")
              }
              else
              {
                $("#signinPage").hide();
                location.reload();
              }
              
          }
        });
      }
      else
      {
          $("#error").append("<div class='text-center text-danger'>Niste popunili sva polja! Sva polja su obavezna!</div>");
      }
})
})

$("#aput").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("acontent").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `asearch.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId(${item.uuid},'${item.uuid}')">${item.name}</li>
         `;
      });
      document.getElementById("aul-list").innerHTML = template;
    },
  });
});

function showId(id, name) {
  document.getElementById("acontent").innerText = id;
  document.querySelector(".form-control").value = name;
  document.getElementById("aul-list").innerHTML = "";
}

$("#aput2").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("acontent2").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `asearch.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId2(${item.uuid},'${item.name}')">${item.name}</li>
         `;
      });
      document.getElementById("aul-list2").innerHTML = template;
    },
  });
});

function showId2(id, name) {
  document.getElementById("acontent2").innerText = id;
  document.querySelector("#aput2").value = name;
  document.getElementById("aul-list2").innerHTML = "";
}

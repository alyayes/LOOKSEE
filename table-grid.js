// Basic Table
if (document.getElementById("table-gridjs"))
    new gridjs.Grid({
         columns: [{
              name: 'ID',
              formatter: (function (cell) {
                   return gridjs.html('' + cell + '');
              })
         },
              "Name",
         {
              name: 'Email',
              formatter: (function (cell) {
                   return gridjs.html('' + cell + '');
              })
         },
              "Position", "Company", "Country",
         {
              name: 'Actions',
              width: '120px',
              formatter: (function (cell) {
                   return gridjs.html("" + "Details" + "");
              })
         },
         ],
         pagination: {
              limit: 5
         },
         sort: true,
         search: true,
         data: [
              ["11", "Alie", "alice@example.com", " Engineer", "ABC Company", "United States"],
              ["12", "Bob", "bob@example.com", "Product Manager", "XYZ Inc", "Canada"],
              ["13", "Charlie", "charlie@example.com", "Data Analyst", "123 Corp", "Australia"],
              ["14", "David", "david@example.com", "UI/UX Designer", "456 Ltd", "United Kingdom"],
              ["15", "Eve", "eve@example.com", "Marketing Specialist", "789 Enterprises", "France"],
              ["16", "Frank", "frank@example.com", "HR Manager", "ABC Company", "Germany"],
              ["17", "Grace", "grace@example.com", "Financial Analyst", "XYZ Inc", "Japan"],
              ["18", "Hannah", "hannah@example.com", "Sales Representative", "123 Corp", "Brazil"],
              ["19", "Ian", "ian@example.com", "Software Developer", "456 Ltd", "India"],
              ["20", "Jane", "jane@example.com", "Operations Manager", "789 Enterprises", "China"]
         ]
    }).render(document.getElementById("table-gridjs"));
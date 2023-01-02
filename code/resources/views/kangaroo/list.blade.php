<html>
  <head>
    <title>Kangaroo Tracker</title>
  </head>
  <body>
    <a href="/kangaroo/add">Add Kangaroo</a>
    <br/><br/>
    <div id="root"></div>
    <!-- include the axios library -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- include the devextreme library -->
    <script src="https://unpkg.com/devextreme/dist/js/dx.all.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/devextreme/dist/css/dx.common.css" />
    <link rel="stylesheet" href="https://unpkg.com/devextreme/dist/css/dx.light.css" />
    
    <script>
      // make an API request using axios
      axios.get("/api/kangaroo")
        .then(response => {
          // extract the data from the response
          const data = response.data.data;

          // create the dxDataGrid
          const grid = new DevExpress.ui.dxDataGrid("#root", {
            dataSource: data,
            columns: [
                {
                    dataField: "name",
                    caption: "Name"
                },
                {
                    dataField: "birthday",
                    caption: "Birthday"
                },
                {
                    dataField: "weight",
                    caption: "Weight"
                },
                {
                    dataField: "height",
                    caption: "Height"
                },
                {
                    type: "buttons",
                    buttons: ["edit", {
                        text: "Edit",
                        onClick: function (e) {
                          var id = e.row.data.id
                          window.location.href = '/kangaroo/'+ id + '/update';
                        }
                    }]
                }
            ],
            paging: {
              pageSize: 10
            },
            sorting: {
              mode: "multiple"
            }
          });
        })
        .catch(error => {
          console.error(error);
        });
    </script>
  </body>
</html>
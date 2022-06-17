

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document PDF</title>

      <style>
        #table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #table td, #table th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #table tr:nth-child(even){background-color: #f2f2f2;}
        
        #table tr:hover {background-color: #ddd;}
        
        #table th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
  </head>
  <body>
      

    <table id="table">
        <thead>
            <tr style="padding: 15px;">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Laporan</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Tanggapan</th>
              </tr>
        </thead>
        <tbody  style="padding: 15px;">
            @forelse ($laporan as $item)
                <tr style="padding: 15px;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->laporan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
                <h1>Data Tidak Ada</h1>
            @endforelse
        </tbody>
      </table>

  </body>
  </html>
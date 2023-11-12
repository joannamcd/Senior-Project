import mysql.connector
import pycurl
import certifi
import requests
from io import BytesIO
from mysql.connector import Error

try: 
    connection = mysql.connector.connect(host='localhost', 
    database='joannaDB', user='joanna', password='J0annaSeniorProject!')

    sql_select_Query = "SELECT * from articles ORDER BY id DESC LIMIT 1"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    
    print("title =", row[0])
    print("username =", row[1])
    print("verification =", row[2])
    print("text_path =", row[3])
    print("type =", row[4])
    print("categories =", row[5])
    print("date =", row[6])
    print("id =", row[7])
    
    filename = row[0] + '.html'

    title = row[0]
    username = row[1]
    veri = row[2]
    textPath = row[3]
    date = row[6]

if connection.is_connected():
    connection.close()
    cursor.close()





f = open(filename, 'w')

message = 
""" <html>
<head>""" + title + """ \n By: """ + username + """ on """ + date + """n Verified User? """ + veri + """</head>
<body>
<object type='text/plain' data=""" + textPath + """ border='0'></object>

<p></p></body>s
</html>"""

f.write(message)
f.close()


files = {
    '/home/joannadir/repos/seniorproject/' + filename + : open(filename, 'rb'),
}

response = requests.post('https://api.bitbucket.org/2.0/repositories/joanna/seniorproject/src', files=files)

repo = git.Repo(/home/joannadir/repos/seniorproject/)
o = repo.remotes.origin
o.pull()
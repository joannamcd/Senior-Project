import mysql.connector

def getAllArticles():
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Adds TaasUser to mySQL DB
    mycursor = mydb.cursor()

    mycursor.execute("SELECT * FROM articles")
    myresult = mycursor.fetchall()
    return myresult 

def getMedArticles():
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Adds TaasUser to mySQL DB
    mycursor = mydb.cursor()

    mycursor.execute("SELECT * FROM articles WHERE article_type = 'medium")
    myresult = mycursor.fetchall()
    return myresult 
def getTechArticles():
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Adds TaasUser to mySQL DB
    mycursor = mydb.cursor()

    mycursor.execute("(SELECT * FROM articles ORDER BY article_id DESC LIMIT 4) ORDER BY article_id DESC")
    myresult = mycursor.fetchall()
    return myresult 

def getStyleArticles():
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Adds TaasUser to mySQL DB
    mycursor = mydb.cursor()

    mycursor.execute("SELECT * FROM articles WHERE article_type = 'styles")
    myresult = mycursor.fetchall()
    return myresult 
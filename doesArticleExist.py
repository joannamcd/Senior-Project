import mysql.connector


def doesArticleExist(Article):
    articleExist = "articleExist"

    # Connect to the database
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Finds article in db b
    mycursor = mydb.cursor(prepared=True)

    sql = "SELECT * FROM articles WHERE article_text_path = %s"

    val = Article

    mycursor.execute(sql, (val,))

    result = mycursor.fetchone()
    
    #check if article does not exist
    if result is None:
        articleExist = "userNotExist"

    return articleExist




    

import mysql.connector


def makeArticle(Articles):
    # Connect to the database
    mydb = mysql.connector.connect(
        host="localhost",
        user="python",
        password="Pyth0nDB!",
        database="joannaDB")

    # Adds TaasUser to mySQL DB
    mycursor = mydb.cursor()


    sql = "INSERT INTO articles " \
          "(article_title, " \
          "author_username," \
          "author_verification," \
          "article_text_path," \
          "article_type," \
          "article_texts,"\
          "article_img)"\
          "VALUES (%s, %s, %s, %s, %s, %s, %s)"



    val = (Articles.article_title,
           Articles.author_username,
           Articles.author_verification,
           Articles.article_text_path,
           Articles.article_type,
           Articles.article_texts,
           Articles.article_img)






    mycursor.execute(sql, val)

    mydb.commit()

    return "articleCreated"

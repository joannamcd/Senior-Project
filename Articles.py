class Articles:

    def __init__(self, article_title, author_username, author_verification, article_text_path, article_type, article_texts, article_img):
        
        

        self.article_title = article_title
        self.author_username = author_username
        self.author_verification = author_verification
        self.article_text_path = article_text_path
        self.article_type = article_type
        self.article_texts = article_texts
        self.article_img = article_img



class myArticles(Articles):

    def __init__(self, article_title, author_username, author_verification, article_text_path, article_type, article_texts, article_img):
        super().__init__(self, article_title, author_username, author_verification, article_text_path, article_type, article_texts, article_img)


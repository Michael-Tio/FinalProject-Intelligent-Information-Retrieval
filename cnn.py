from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium import *
import sys
import json
import pandas as pd
import time
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

# keyCNN = sys.argv[1]

path = 'C:/Users/ASUS/Downloads/INSTALLER/chromedriver'
driver = webdriver.Chrome(executable_path = path)
driver.get('https://www.cnnindonesia.com/search/?query=niall+horan')
# driver.implicitly_wait(15)

news = driver.find_elements(By.TAG_NAME, 'article')

newsList = []
i = 0

for new in news:
    cnnTitle = new.find_element(By.CLASS_NAME, 'title')
    cnnDate = new.find_element(By.XPATH, '//*[@class="date"]')
    # WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, './/a/span[@class="box_text"]/span[@class="kanal"]')))
    cnnCategory = new.find_element(By.XPATH, '//a/span[@class="box_text"]/span[@class="kanal"]')
    # cnnCategory = new.find_element(By.TAG_NAME, 'span.kanal')
    # if (cnnTitle.text != '' or cnnDate.text != '' or cnnCategory.text != ''):
    #     newsList.append([cnnTitle.text, cnnDate.text, cnnCategory.text])
    if (cnnTitle.text != '' or cnnDate.text != '' or cnnCategory.text != ''):
        crawled = {
            'newsTitle' : cnnTitle.text,
            'newsDate' : cnnDate.text,
            'newsCategory' : cnnCategory.text
        }
        newsList.append(crawled)
    # i += 1
    # # time.sleep(8)
    # cnnLink = new.find_element(By.TAG_NAME, 'a').get_attribute('href')
    # newsList.append(cnnLink)

# print(json.dumps(newsList))

# print("here")
# print("")

df = pd.DataFrame(newsList)
print(df)
from selenium import webdriver
from selenium.webdriver.common.by import By
import sys
import json

keyOkezone = sys.argv[1]

path = 'C:/Users/ASUS/Downloads/INSTALLER/chromedriver'
driver = webdriver.Chrome(executable_path = path)
driver.get('https://search.okezone.com/search?q=' + keyOkezone + '&highlight=1&sort=desc&start=0')

news = driver.find_elements(By.CLASS_NAME, 'listnews')

newsList = []

for new in news:
    ozTitle = new.find_element(By.XPATH, './/div[@class="explan"]/div[@class="title"]/a')
    ozDate = new.find_element(By.XPATH, './/div[@class="explan"]/div[@class="tgl"]')
    ozCategory = new.find_element(By.CLASS_NAME, 'kanal')
    if (ozTitle.text != '' or ozDate.text != '' or ozCategory.text != ''):
        newsList.append([ozTitle.text, ozDate.text, ozCategory.text])

print(json.dumps(newsList))
import urllib2
import time
import random


url = "http://www.al-maliki.com/admin/post"

while True:
    r = urllib2.urlopen(url)
    if r.code == 200:
        print "post sukses"
    print "waiting for the next post"
    time.sleep(random.randint(28800, 86400))

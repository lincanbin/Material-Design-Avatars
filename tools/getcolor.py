#encoding=utf-8
from xml.dom import minidom
doc = minidom.parse("color.xml")
root = doc.documentElement
resources = root.getElementsByTagName("color")
for color in resources:
    #print "0x"+color.childNodes[0].nodeValue.replace("#","")
    print "array(",
    print int("0x"+color.childNodes[0].nodeValue.replace("#","")[0:2],16),
    print ",",
    print int("0x"+color.childNodes[0].nodeValue.replace("#","")[2:4],16),
    print ",",
    print int("0x"+color.childNodes[0].nodeValue.replace("#","")[4:6],16),
    print "),"
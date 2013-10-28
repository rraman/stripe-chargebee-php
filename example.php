import chargebee
from chargebee.environment import Environment
from chargebee.main import ChargeBee

Environment.chargebee_domain = "localcb.com:8080"
ChargeBee.verify_ca_certs = False

chargebee.configure("__dev__xHTGzjfxpZZBqXzjfuAVsS9sVpgOM3F8", "mannar-test")

def new_checkout():
    result = chargebee.HostedPage.checkout_new({
            "subscription" : {
                "plan_id" : "1361508223"
            }, 
            "embed":"false"
        })
    hosted_page = result.hosted_page
    print hosted_page

def retrive_hostedpage():
    result = chargebee.HostedPage.retrieve("7Bsd8e03q30JIsoJzniFt63olFI5GiIB");
    hosted_page = result.hosted_page
    print hosted_page.content.subscription


def list_subscriptions():
    list = chargebee.Subscription.list({"limit" : 10})
    while list.next_offset is not None:
        print list.next_offset
        for entry in list:
            subscription = entry.subscription
            print subscription
            customer = entry.customer
            card = entry.card
        list = chargebee.Subscription.list({"limit" : 10, "offset":list.next_offset})
        print("length is %s", len(list))
        
def retrieve_subscription():
    result = chargebee.Subscription.retrieve("trial")
    print(result.subscription)
    for c in result.subscription.coupons:
        print(c)
    print (result.subscription.trial_start, result.subscription.trial_end, result.subscription.created_at)
    if(result.subscription.trial_start == None):
        print("never been in trial")


def create_estimate():
    result = chargebee.Estimate.create_subscription({
            "subscription" : {
                "plan_id" : "basic"
        }})
    print(result.estimate)    

def list_events():
    i = 0;
    offset = ""
    while offset != None and i < 3:
        result = chargebee.Event.list({
            "limit" : 10
        })
        i += 1
        for item in result:
        	evt = item.event
        	print(evt.occurred_at, evt.event_type, evt.id, evt.webhook_status)
        offset = result.next_offset
            
retrieve_subscription()
# create_estimate()
# list_events()
# new_checkout()

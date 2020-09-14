void remove_contact()
{
    int counter1=0;
    int counter2=0;
    int flag=0;
    char deletedFirst [20];
    char deletedLast  [20];
    printf("First name: ");
    scanf("%s",deletedFirst);
    printf("Last name: ");
    scanf("%s",deletedLast);
    for (counter1=0; counter1<count; counter1++)
    {
        if (strcasecmp(deletedFirst, myarr[counter1].first_name)==0)
        {
            if (strcasecmp(deletedLast, myarr[counter1].last_name)==0)
            {

                for (counter2=counter1; counter2 < count -1; counter2++)
                {
                    strcpy(myarr[counter2].first_name,myarr[counter2 +1].first_name);
                    strcpy(myarr[counter2].last_name,myarr[counter2 +1].last_name);
                    myarr[counter2].birthdate.day = myarr[counter2 +1].birthdate.day;
                    myarr[counter2].birthdate.month = myarr[counter2 +1].birthdate.month;
                    myarr[counter2].birthdate.year = myarr[counter2 +1].birthdate.year;
                    strcpy(myarr[counter2].address,myarr[counter2 +1].address );
                    strcpy(myarr[counter2].email,myarr[counter2 +1].email );
                    strcpy(myarr[counter2].phone_number,myarr[counter2 +1].phone_number );

                }
                    flag=1;
                    count--;
            }
        }
    }
    if (flag==1)
        printf("contact with first name %s is deleted from the phonebook.\n",deletedFirst);
    else
        printf("contact not found \n");

}

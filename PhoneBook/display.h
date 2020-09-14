void print_bubblesort()
{
   int i = 0, j = 0,y;
   contact temp;

   for (i = 0; i < count-1; i++)
    {

       for (j = 0; j < count - i - 1; j++)
       {
            if (strcasecmp(myarr[j].last_name,myarr[j+1].last_name)>0)
            {
                temp = myarr[j];
                myarr[j] = myarr[j+1];
                myarr[j+1] = temp;


            }
            if (strcasecmp(myarr[j].last_name,myarr[j+1].last_name)==0)
            {
                if (strcasecmp(myarr[j].first_name,myarr[j+1].first_name)>0)
                {
                    temp = myarr[j];
                    myarr[j] = myarr[j+1];
                    myarr[j+1] = temp;


                }
            }
        }
    }

    for (y=0;y<count;y++)
    {
        printf("First name: %s \n",myarr[y].first_name);
        printf("Last name: %s \n",myarr[y].last_name);
        printf("Birthdate: %d%d%d \n",myarr[y].birthdate.day,myarr[y].birthdate.month,myarr[y].birthdate.year);
        printf("Address: %s \n",myarr[y].address);
        printf("Email: %s \n",myarr[y].email);
        printf("Phone number: %s \n\n",myarr[y].phone_number);
    }
}
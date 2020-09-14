void search_contacts()
{
    int i,flag=0;
    char lastname[20];
    printf("Enter last name: ");
    scanf("%s",lastname);
    for(i=0;i<count;i++)
    {
      if (!strcasecmp(myarr[i].last_name,lastname))
      {
            printf("\n");
            printf("First name: %s \n",myarr[i].first_name);
            printf("Last name: %s \n",myarr[i].last_name);
            printf("Birthdate: %d-%d-%d \n",myarr[i].birthdate.day,myarr[i].birthdate.month,myarr[i].birthdate.year);
            printf("Address: %s \n",myarr[i].address);
            printf("Email: %s \n",myarr[i].email);
            printf("Phone number: %s \n\n",myarr[i].phone_number);
            flag=1;
      }
    }
    if (flag==0)
      printf("No contact found");


}